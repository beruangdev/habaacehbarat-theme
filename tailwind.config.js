const colors = require("tailwindcss/colors");
/** @type {import('tailwindcss').Config} */
module.exports = {
  darkMode: "class",
  content: [
    // https://tailwindcss.com/docs/content-configuration
    "./*.php",
    "./inc/**/*.php",
    "./template-parts/**/*.php",
    "./safelist.txt",
    "./node_modules/flowbite/**/*.js",
  ],
  // safelist: [
  //   "text-center",
  //   //{
  //   //  pattern: /text-(white|black)-(200|500|800)/
  //   //}
  // ],
  theme: {
    extend: {
      boxShadow: {
        md: "0 4px 6px -1px rgb(0 0 0 / 0.3), 0 2px 4px -2px rgb(0 0 0 / 0.3)",
        lg: "0 10px 15px -3px rgb(0 0 0 / 0.3), 0 4px 6px -4px rgb(0 0 0 / 0.3)",
      },
    },
    colors: {
      primary: colors.blue,
      background: { ...colors.zinc, 75: "#f9f9fa", 925: "#0b0b0d" },
    },
  },
  plugins: [
    require("flowbite/plugin"),
    require("@tailwindcss/typography"),
    require("@tailwindcss/forms"),
  ],
};
