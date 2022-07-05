const defaultTheme = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                light: "#e2f3f5",
                teal: "#22d1ee",
                dark: "#707070",
                blue: {
                  'DEFAULT': '#f00'
                }
            },
        },
    },

    plugins: [require('@tailwindcss/forms')],
};
