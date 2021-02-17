const defaultTheme = require('tailwindcss/defaultTheme');
const plugin = require('tailwindcss/plugin');
const Color = require('color');

module.exports = {
    purge: ['public/**/*.html'],
    theme: {
        themeVariants: ['dark'],
        customForms: (theme) => ({
            default: {
                'input, textarea': {
                    '&::placeholder': {
                        color: theme('colors.gray.400'),
                    },
                },
            },
        }),
        extend: {
            fontFamily: {
                sans: ['Inter', ...defaultTheme.fontFamily.sans],
            },
        },
    },
    variants: {
        backgroundColor: [
            'hover',
            'focus',
            'active',
            'odd',
            'dark',
            'responsive',
            'dark:hover',
            'dark:focus',
            'dark:active',
            'dark:odd',
        ],
        display: ['responsive', 'dark'],
        textColor: [
            'focus-within',
            'hover',
            'active',
            'responsive',
            'dark',
            'dark:focus-within',
            'dark:hover',
            'dark:active',
        ],
        placeholderColor: ['focus', 'dark', 'dark:focus'],
        borderColor: ['focus', 'hover', 'dark', 'dark:focus', 'dark:hover'],
        divideColor: ['dark'],
        boxShadow: ['focus', 'dark:focus'],
    },
    plugins: [
        require('tailwindcss-multi-theme'),
        require('@tailwindcss/forms'),
        plugin(({ addUtilities, e, theme, variants }) => {
            const newUtilities = {}
            Object.entries(theme('colors'))
                .map(([name, value]) => {
                    if (name === 'transparent' || name === 'current') return
                    const color = value[300] ? value[300] : value
                    const hsla = Color(color)
                        .alpha(0.45)
                        .hsl()
                        .string()
                    newUtilities[`.shadow-outline-${name}`] = {
                        'box-shadow': `0 0 0 3px ${hsla}`,
                    }
                })
            addUtilities(newUtilities, variants('boxShadow'))
        }),
    ],
}
