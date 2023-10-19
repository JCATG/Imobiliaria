/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./*.{php,html,js}","./template-parts/*.{php,html,js}"],
  theme: {
    extend: {
      colors: {
        grennCorretor: "#22c55e",
        grennHover:"#bbf7d0", // Change 'customBlue' to the name of your color and '#0073e6' to your desired color code
        // Add more custom colors here
      },
    },
  },
  plugins: [],
}

