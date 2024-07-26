/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    './pagaes/Hotels.html', // Include all HTML and JS files in the pages directory
    './*.{html,js}' // Include the main index.html file
    // Add other paths as necessary
  ],
  theme: {
    extend: {
      space:{
        '500':'500px'
      },
      margin :{
        '100px':'100px'
      },
      height :{
          '500':'500px'

      },
      padding :{
        '100':'100px'
      },
      keyframes:{
        'smouthnes':''
      },
      height:{
        '1000':'2rem'

      },
      colors : {
        'BlueDark':'#1f2233',
        'YellowSun':'#f3cc7d',
      },
      

        fontFamily:{

          'great':['Great Vibes', 'cursive'],

        }, 
    },
  },
  plugins: [],
}

