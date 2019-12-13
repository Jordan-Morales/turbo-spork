// =============================
// DEPENDENCIES
// =============================
// packages
import React from 'react'

// components

// =============================
// COMPONENT CLASS
// =============================
// BaseURL Definer
let baseUrl = '';
if (process.env.NODE_ENV === 'development') {
  baseUrl = 'http://localhost:8888'
} else {
  baseUrl = 'https://turbo-spork-app.herokuapp.com/'
}

class Main extends React.Component{

//// ==============
//// RENDER
//// ==============
  render (){
    return (
      <div>
      This is the main section.
        <div>This is where the cards will go.</div>
      </div>
    )
  }

}
// =============================
// EXPORT
// =============================
export default Main
