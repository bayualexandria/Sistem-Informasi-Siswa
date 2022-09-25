/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./app/Views/**/*.php",
    "./app/Views/**/*.js",
    "./app/Views/**/*.jsx",
  ],
  theme: {
    container: {
      center: true,
      padding: "16px",
    },
    extend: {
      colors: {
        primary: "#009FDE",
        "light-primary": "#A4DDF7",
      },
      fontFamily: {
        noto: ["'Noto Serif'", "serif"],
      },
    },
  },
};
