import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import typography from '@tailwindcss/typography';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    darkMode: ['selector', '[data-mode="dark"]'],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Poppins', ...defaultTheme.fontFamily.sans],
            },
            backgroundImage: {
                "dice-banner": "url('https://arcanis-diceworks.test/images/stock/dice_banner.png')",
                "dice-masked": "url('https://arcanis-diceworks.test/images/stock/d20_masked.png')",
                "logo": "url('https://arcanis-diceworks.test/images/emblems/emblem-white-arcanis-diceworks.svg')",
                "dice": "url('https://arcanis-diceworks.test/images/stock/stock_dice.png')",
            },
            colors: {
                'bunker': '#0B1013',
                'cinder': '#15121B',
                'minsk': '#37378C',
                'mine': '#3D3D3D',
                'star-yellow': '#FFC01D',
                'heliotrope': '#8958FE',
                'dodger-blue': '#3483FA',
                'athens': '#F0F0F2',
                'bastille': '#25212D',
            },
            height: {
                800: '50rem',
                920: '57.5rem',
                704: '44rem',
            },
            width: {
                586: '36.8125rem'
            },
            zIndex: {
                5: 5,
            }
        },
    },

    plugins: [forms, typography],
};
