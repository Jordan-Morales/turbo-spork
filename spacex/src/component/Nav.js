// =============================
// DEPENDENCIES
// =============================
// packages
import React from 'react'

// components

// =============================
// COMPONENT CLASS
// =============================
class Nav extends React.Component{


//// ==============
//// RENDER
//// ==============
  render (){
    return (
      <div>
        <nav>
          This is the nav bar.
          <button href="#">Home
          </button>
          <button href="#">About SpaceX
          </button>
          <button href="#">About Team
          </button>
        </nav>
      </div>
    )
  }
}

// =============================
// EXPORT
// =============================
export default Nav
