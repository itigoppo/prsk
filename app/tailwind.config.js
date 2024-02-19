import forms from "@tailwindcss/forms"
import defaultTheme from "tailwindcss/defaultTheme"

/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
    "./storage/framework/views/*.php",
    "./resources/views/**/*.blade.php",
    "./app/View/Components/*.php",
  ],

  theme: {
    colors: {
      transparent: "transparent",
      white: "#ffffff",
      black: "#000000",
      gray: {
        50: "#f7f7f7",
        100: "#f0f0f0",
        200: "#e3e3e3",
        300: "#d1d1d1",
        400: "#bfbfbf",
        500: "#aaaaaa",
        600: "#969696",
        700: "#818181",
        800: "#6a6a6a",
        900: "#585858",
        950: "#333333",
      },
      // エメグリ
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
      // ピンク
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
      // 青
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
      // 黄緑
      atlantis: {
        50: "#f5faeb",
        100: "#e8f4d3",
        200: "#d2e9ad",
        300: "#b4da7c",
        400: "#93c54b",
        500: "#79ad35",
        600: "#5e8927",
        700: "#486922",
        800: "#3b5420",
        900: "#34481f",
        950: "#19270c",
      },
      // 水色 ランクマ(相手)
      scooter: {
        50: "#ecfeff",
        100: "#cefaff",
        200: "#a3f4fe",
        300: "#63e9fd",
        400: "#1dd4f3",
        500: "#01bbde",
        600: "#0492b6",
        700: "#0b7493",
        800: "#135e77",
        900: "#144e65",
        950: "#073345",
      },
      // オレンジ ランクマ(自分)
      flamenco: {
        50: "#fff7ed",
        100: "#ffecd4",
        200: "#ffd5a9",
        300: "#ffb772",
        400: "#fe8932",
        500: "#fd6c12",
        600: "#ee5208",
        700: "#c53c09",
        800: "#9c3010",
        900: "#7e2910",
        950: "#441206",
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
