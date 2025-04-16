import defaultTheme from 'tailwindcss/defaultTheme'
import forms from '@tailwindcss/forms'
import typography from '@tailwindcss/typography'

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './resources/views/**/*.blade.php',
    ],

    theme: {
        container: {
            center: true,
            padding: '1rem',
        },

        extend: {
            fontFamily: {
                sans: ['Outfit', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                'primary': 'blue',
                'primary-500': '#3B82F6',
                'primary-600': '#2563EB',
            },
        },

        screens: {
            ...defaultTheme.screens,
            '2xl': '1440px',
        },
    },

    plugins: [forms, typography],
}
