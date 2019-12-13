// =============================
// DEPENDENCIES
// =============================
// packages
import React from 'react';

// components
import Nav from './component/Nav'
import Main from './component/Main'
import Space from './component/SpaceX'
import Team from './component/Team'
// =============================
// COMPONENT CLASS
// =============================
class App extends React.Component {
  constructor(props){
    super(props)
    this.state = {
      view: {
        page: 'home',
        pageTitle: 'on load'
      }
    }
  }

//// ==============
//// RENDER
//// ==============
  render(){
    return(
      <div className="container">

      this is the primary container

      <Nav />
      <Main
      view={this.state.view}
      />
      <Team />
      <Space />
      </div>
    )
  }
}

// =============================
// EXPORT
// =============================
export default App;
