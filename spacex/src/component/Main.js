// =============================
// DEPENDENCIES
// =============================
// packages
import React from 'react'

// components
import Space from './SpaceX'
import Launches from './Launches'
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
        <Launches />
        <Space />
      </div>
    )
  }

}
// =============================
// EXPORT
// =============================
export default Main
