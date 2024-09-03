/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      fontFamily: {
        'roboto-condensed': ['"Roboto Condensed"', 'sans-serif'],
        'volkov': ['"Volkhov"' , 'serif'],
      },
    },
  },
  plugins: [],
}

