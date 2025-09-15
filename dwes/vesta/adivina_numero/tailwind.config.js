/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./src/**/*.{html,js,php_}"],
  theme: {
    extend: {},
  },
  plugins: [require("daisyui")],
}

