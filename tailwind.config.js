import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                'custom-red': {
                    DEFAULT: '#e63946',
                    50: '#fee7e9',
                    100: '#fcc5c9',
                    200: '#f99da5',
                    300: '#f57581',
                    400: '#f04e5d',
                    500: '#e63946',
                    600: '#d33240',
                    700: '#b82a37',
                    800: '#9c232e',
                    900: '#801c25',
                },
                'custom-black': {
                    DEFAULT: '#1d2731',
                    50: '#e6e7e8',
                    100: '#c1c3c5',
                    200: '#979c9f',
                    300: '#6d7479',
                    400: '#43484e',
                    500: '#1d2731',
                    600: '#1a232c',
                    700: '#161d24',
                    800: '#13181d',
                    900: '#0f1216',
                },
                'custom-gray': {
                    DEFAULT: '#e8e8e8',
                    50: '#fafafa',
                    100: '#f5f5f5',
                    200: '#eeeeee',
                    300: '#e8e8e8',
                    400: '#bdbdbd',
                    500: '#9e9e9e',
                    600: '#757575',
                    700: '#616161',
                    800: '#424242',
                    900: '#212121',
                },
            },
        },
    },

    plugins: [forms],
};
