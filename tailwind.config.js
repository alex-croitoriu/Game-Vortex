/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
  ],
  theme: {
    extend: {
      colors: {
        'cyan-primary': '#15ebfb',
        'orange-primary': '#f1361f'
      },
      fontFamily: {
        'gomme-sans': 'Gomme-Sans'
      },
      screens: {
        'xs': '480px'
      }
    },
  },
  plugins: [],
}

