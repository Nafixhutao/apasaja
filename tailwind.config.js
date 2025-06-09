module.exports = {
  content: [
    "./src/**/*.{js,jsx,ts,tsx}",
  ],
  theme: {
    extend: {
      colors: {
        'chatgpt-gray': '#343541',
        'chatgpt-dark': '#202123',
        'assistant-bg': '#444654',
        'user-bg': '#343541',
      },
    },
  },
  plugins: [
    require('@tailwindcss/typography'),
  ],
} 