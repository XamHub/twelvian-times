import defaultTheme from 'tailwindcss/defaultTheme';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                'background': '#d2c7c3',
                'content': '#ebebeb',
                'primary': '#4c4c4c',
                'secondary': '#cddf70',
            },
            fontSize: {
                'name': 'clamp(1.5rem, 8vw, 5rem)',
            },
        },
    },
    plugins: [],
};
