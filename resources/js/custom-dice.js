import * as THREE from 'three';

import Stats from 'three/addons/libs/stats.module.js';

import { OrbitControls } from 'three/addons/controls/OrbitControls.js';
import { RoomEnvironment } from 'three/addons/environments/RoomEnvironment.js';

import { GLTFLoader } from 'three/addons/loaders/GLTFLoader.js';
import { DRACOLoader } from 'three/addons/loaders/DRACOLoader.js';

let mixer;

const clock = new THREE.Clock();
const container = document.getElementById( 'container' );

const stats = new Stats();
container.appendChild( stats.dom );

const renderer = new THREE.WebGLRenderer( { antialias: true } );
renderer.setPixelRatio( window.devicePixelRatio );
renderer.setSize( window.innerWidth, window.innerHeight );
container.appendChild( renderer.domElement );

const pmremGenerator = new THREE.PMREMGenerator( renderer );

const scene = new THREE.Scene();
scene.background = new THREE.Color( 0xbfe3dd );
scene.environment = pmremGenerator.fromScene( new RoomEnvironment(), 0.04 ).texture;

const directionalLight = new THREE.DirectionalLight(0xffffff, 1); // Bright white light
directionalLight.position.set(5, 10, 7.5); // Position the light above and to the side
directionalLight.castShadow = true; // Enable shadows
scene.add(directionalLight);

const camera = new THREE.PerspectiveCamera( 40, window.innerWidth / window.innerHeight, 1, 100 );
camera.position.set( 5, 2, 8 );

const controls = new OrbitControls( camera, renderer.domElement );
controls.addEventListener( 'change', render ); // use if there is no animation loop
controls.minDistance = 5;
controls.maxDistance = 12;
controls.target.set( 0, 0, - 0.2 );
controls.update();

const dracoLoader = new DRACOLoader();
dracoLoader.setDecoderPath( 'jsm/libs/draco/gltf/' );

const loader = new GLTFLoader();
loader.setDRACOLoader( dracoLoader );
loader.load( 'D20.glb', function ( gltf ) {

    const model = gltf.scene;
    model.scale.set(0.3, 0.3, 0.3);
    scene.add(model);

    addGlitterInsideModel(model);

    // Calculate the bounding box of the model
    const box = new THREE.Box3().setFromObject(model);
    const center = box.getCenter(new THREE.Vector3()); // Get the center of the bounding box
    const size = box.getSize(new THREE.Vector3()); // Get the size of the bounding box

    // Reposition the model to center it in the scene
    model.position.sub(center); // Center the model
    box.setFromObject(model); // Recompute the bounding box

    // Position the camera at a distance based on the size of the model
    const maxDim = Math.max(size.x, size.y, size.z); // Get the largest dimension
    const fov = camera.fov * (Math.PI / 180); // Convert FOV to radians
    let cameraDistance = Math.abs(maxDim / Math.sin(fov / 2));

    // Set the camera position based on the model size and bounding box
    camera.position.set(center.x, center.y, cameraDistance);
    camera.lookAt(center); // Make sure the camera is looking at the center of the model

    // Update OrbitControls to target the center of the model
    controls.target.copy(center);
    controls.enablePan = false; // Disable panning
    controls.enableZoom = false; // Disable zooming
    controls.update();

    model.traverse((child) => {
        if (child.isMesh) {
            console.log(`Mesh: ${child.name}`);
            if (Array.isArray(child.material)) {
                child.material.forEach((mat, index) => {
                    console.log(`Child Material ${index}: ${mat.name}`);
                });
            } else {
                console.log(`Material: ${child.material.name}`);
                if(child.material.name === 'Dice') {
                    child.material = makeGlassMaterial(child.material);
                }
            }
        }
    });

    animate();

}, undefined, function ( e ) {

    console.error( e );

} );


window.onresize = function () {

    camera.aspect = window.innerWidth / window.innerHeight;
    camera.updateProjectionMatrix();

    renderer.setSize( window.innerWidth, window.innerHeight );

    animate();

};

function makeGlassMaterial(material) {
    return new THREE.MeshPhysicalMaterial({
        roughness: 0,
        transmission: 1,
        thickness: 0.5,
        color: new THREE.Color(0x00FF00)
    });
}


function animate() {

    controls.update();

    stats.update();

    renderer.render( scene, camera );

}

function render() {

    renderer.render( scene, camera );

}

function addGlitterInsideModel(model) {
    const glitterCount = 3000; // Number of glitter particles
    const glitterGeometry = new THREE.BufferGeometry();
    const glitterPositions = [];

    // Traverse the model to get its geometry
    model.traverse((child) => {
        if (child.isMesh && child.geometry) {
            const geometry = child.geometry;
            geometry.computeBoundingBox(); // Compute the bounding box of the geometry
            geometry.computeVertexNormals(); // Ensure normals are available

            // Get the position attribute of the geometry
            const positionAttribute = geometry.getAttribute('position');
            const faceCount = positionAttribute.count / 3;

            // Generate random positions inside the model's faces
            for (let i = 0; i < glitterCount; i++) {
                const faceIndex = Math.floor(Math.random() * faceCount);
                const vertexA = new THREE.Vector3().fromBufferAttribute(positionAttribute, faceIndex * 3);
                const vertexB = new THREE.Vector3().fromBufferAttribute(positionAttribute, faceIndex * 3 + 1);
                const vertexC = new THREE.Vector3().fromBufferAttribute(positionAttribute, faceIndex * 3 + 2);

                // Random point inside the triangle (using barycentric coordinates)
                const randomPoint = randomPointInTriangle(vertexA, vertexB, vertexC);

                glitterPositions.push(randomPoint.x, randomPoint.y, randomPoint.z);
            }
        }
    });

    // Add positions to the geometry
    glitterGeometry.setAttribute('position', new THREE.Float32BufferAttribute(glitterPositions, 3));

    // Create a glitter material
    const glitterMaterial = new THREE.PointsMaterial({
        color: 0x0000ff, // White color for glitter
        size: 0.05,      // Adjust size for small glitter points
        sizeAttenuation: true,
        transparent: true,
        opacity: 0.8,
        map: new THREE.TextureLoader().load('images/stock/d20_masked.png'), // Optionally use a texture for glitter
        depthWrite: false, // Avoid z-fighting with the model
    });

    // Create the points object
    const glitter = new THREE.Points(glitterGeometry, glitterMaterial);

    // Add the glitter to the scene or to the model
    model.add(glitter);  // You can also do `model.add(glitter)` if you want the glitter to move with the model
}

// Function to generate a random point inside a triangle
function randomPointInTriangle(vertexA, vertexB, vertexC) {
    let u = Math.random();
    let v = Math.random();

    // Ensure the point is inside the triangle
    if (u + v > 1) {
        u = 1 - u;
        v = 1 - v;
    }

    // Compute the point's position using barycentric coordinates
    const point = new THREE.Vector3();
    point.addScaledVector(vertexA, 1 - u - v);
    point.addScaledVector(vertexB, u);
    point.addScaledVector(vertexC, v);

    return point;
}
