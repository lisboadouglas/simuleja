/** @type {import('tailwindcss').Config} */
import defaultTheme from 'tailwindcss/defaultTheme';
import typography from '@tailwindcss/typography';
import forms from '@tailwindcss/forms';
import aspectRatio from '@tailwindcss/aspect-ratio';
export default {
  content: [
    './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
    './storage/framework/views/*.php',
    './resources/views/**/*.blade.php',
  ],
  theme: {
    extend: {
      fontFamily: {
        sans: ['Nunito', ...defaultTheme.fontFamily.sans],
      },
    },
  },
  plugins: [typography, forms, aspectRatio],
  safelist: [
    'bg-gradient-to-tr',
    'bg-gradient-to-tl',
    'bg-gradient-to-br',
    'bg-gradient-to-bl',
    'from-green-100/50',
    'from-green-200/50',
    'from-green-300/50',
    'from-green-400/50',
    'from-green-500/50',
    'from-green-600/50',
    'to-green-600',
    'to-green-400',
    'from-blue-100/50',
    'from-blue-200/50',
    'from-blue-300/50',
    'from-blue-400/50',
    'from-blue-500/50',
    'from-blue-600/50',
    'to-blue-600',
    'to-blue-400',
    'to-green-50',
    'to-green-100',
    'to-green-200',
    'to-green-300',
    'to-green-400',
    'to-green-500',
    'text-white',
    'shadow-2xl',
    'shadow-black',
    'shadow-white',
    'border-lime-500/20',
    'border-lime-500',
  ]
}

