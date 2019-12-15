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
        <div className="row">
          <div className="col s12 m6">

            <div className="card blue-grey">
          This is where the cards will go.
            </div>

          </div>
        </div>
      </div>
    )
  }

}
// =============================
// EXPORT
// =============================
export default Main
