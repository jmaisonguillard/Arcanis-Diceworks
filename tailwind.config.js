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

    theme: {
        extend: {
            fontFamily: {
                sans: ['Poppins', ...defaultTheme.fontFamily.sans],
            },
            backgroundImage: {
                "dice-banner": "url('https://arcanis-diceworks.test/images/stock/dice_banner.png')",
                "dice-masked": "url('https://arcanis-diceworks.test/images/stock/d20_masked.png')",
                "logo": "url('https://arcanis-diceworks.test/images/emblems/emblem-white-arcanis-diceworks.svg')"
            },
            colors: {
                'bunker': '#0B1013',
                'cinder': '#15121B',
                'minsk': '#37378C',
                'star-yellow': '#FFC01D',
                'heliotrope': '#8958FE',
                'dodger-blue': '#3483FA',
                'athens': '#F0F0F2',
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
