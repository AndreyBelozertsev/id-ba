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
        screens: {
            'xxs': '375px',
            'xs': '468px',
            'sm': '540px',
            'md': '720px',
            'lg': '960px',
            'xl': '1140px',
            '2xl': '1280px',
            '3xl': '1550px',
        },
        container: {
            center: true,
            padding: {
              DEFAULT: '20px',
              xs: '16px',
              sm: '16px',
            },
        },
        fontFamily: {
            'nunito-700': 'NunitoSans-Bold',
            'nunito-400': 'NunitoSans-Regular',
        },
        extend: {
            colors: {
                'header': '#6EBB62',
                'btn': '#6EBB62',
                'btn-sec-21': '#4042A4',
                'btn-sec-22': '#189113',
                'default': '#C8F3C8',
                'block-r': '#ddd9f9',
                'block-l': '#c8f2ca',
                'default-text': '#333333',
                'form-bg': '#ddd9f9',
                'p2_sec-2': '#8f90f8',
            },
        },
    },

    plugins: [
        forms
    ],
};
