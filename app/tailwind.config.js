import forms from "@tailwindcss/forms"
import defaultTheme from "tailwindcss/defaultTheme"

/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
    "./storage/framework/views/*.php",
    "./resources/views/**/*.blade.php",
  ],

  theme: {
    colors: {
      transparent: "transparent",
      white: "#ffffff",
      black: "#000000",
      gray: {
        50: "#f8f9fa",
        100: "#eceff2",
        200: "#d6dce1",
        300: "#b2bec7",
        400: "#889ba8",
        500: "#697e8e",
        600: "#546775",
        700: "#45535f",
        800: "#3c4750",
        900: "#353d45",
        950: "#23292e",
      },
      "puerto-rico": {
        50: "#f3faf7",
        100: "#d8efe7",
        200: "#b1decf",
        300: "#78c2ad",
        400: "#58a995",
        500: "#3e8e7b",
        600: "#2f7264",
        700: "#295c52",
        800: "#254a43",
        900: "#223f39",
        950: "#0f2421",
      },
      "sea-pink": {
        50: "#fdf3f3",
        100: "#fce4e5",
        200: "#faced0",
        300: "#f3969a",
        400: "#ee7b80",
        500: "#e25157",
        600: "#ce343b",
        700: "#ad282e",
        800: "#902429",
        900: "#782428",
        950: "#410e10",
      },
      azure: {
        50: "#f4f7fb",
        100: "#e8eef6",
        200: "#ccdbeb",
        300: "#9fbeda",
        400: "#6b9bc5",
        500: "#487faf",
        600: "#325d88",
        700: "#2d5177",
        800: "#284564",
        900: "#263c54",
        950: "#192738",
      },
    },
    extend: {
      fontFamily: {
        sans: [
          "Nunito",
          "M PLUS 1p",
          "Figtree",
          ...defaultTheme.fontFamily.sans,
        ],
      },
    },
  },

  plugins: [forms],

  darkMode: "class",
  // darkMode: "media",
}
