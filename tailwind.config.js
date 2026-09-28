/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./index.html", "./*.{html,js}"],
  theme: {
    extend: {
      colors: {
        'apple-blue': {
          DEFAULT: '#0071e3',
          hover: '#0077ed',
          active: '#0062c4',
          tint: 'rgba(0, 113, 227, 0.08)',
        },
        'apple-gray': {
          50: '#fbfbfd',
          100: '#f5f5f7',
          200: '#e5e5ea',
          300: '#d1d1d6',
          400: '#a1a1a6',
          500: '#86868b',
          600: '#6e6e73',
          700: '#48484a',
          800: '#1d1d1f',
          900: '#121214',
          950: '#000000',
        }
      },
      fontFamily: {
        sans: [
          '-apple-system',
          'BlinkMacSystemFont',
          '"SF Pro Display"',
          '"SF Pro Text"',
          '"Plus Jakarta Sans"',
          '"Helvetica Neue"',
          'Arial',
          'sans-serif'
        ]
      },
      letterSpacing: {
        'apple-tight': '-0.035em',
        'apple-snug': '-0.02em',
      },
      borderRadius: {
        'apple-card': '24px',
        'apple-bento': '28px',
      },
      boxShadow: {
        'apple-sm': '0 4px 20px rgba(0, 0, 0, 0.04)',
        'apple-card': '0 8px 30px rgba(0, 0, 0, 0.06)',
        'apple-hover': '0 20px 45px rgba(0, 0, 0, 0.12)',
        'apple-glow': '0 16px 40px rgba(0, 113, 227, 0.2)',
      }
    },
  },
  plugins: [],
}
