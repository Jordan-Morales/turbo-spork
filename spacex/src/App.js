// =============================
// DEPENDENCIES
// =============================
// packages
import React from 'react';

// components
import Nav from './component/Nav'
import Main from './component/Main'

// =============================
// COMPONENT CLASS
// =============================

// ExternalAPI-URL Definer
let apiUrl = '';
if (process.env.NODE_ENV === 'development') {
  apiUrl = 'https://api.spacexdata.com/v3/launches/'
} else {
  console.log('nothing');
}

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
  //returns entire launch array, currently approx 100+ items
  pullLaunches = () => {
      fetch(`${apiUrl}`)
      .then(data => data.json())
      .then(jData => {
        this.setState({
          launch: jData
        })
      }).catch(err=>console.log(err))
    }
  componentDidMount() {
    this.pullLaunches()
  }
//// ==============
//// RENDER
//// ==============
  render(){
    return(
      <div className="container">
        <button onClick={this.pullLaunches}>GRAB LATEST LAUNCH</button>
        this is the primary container
        <Nav />
        <Main
        view={this.state.view}

        />
      </div>
    )
  }
}

// =============================
// EXPORT
// =============================
export default App;
