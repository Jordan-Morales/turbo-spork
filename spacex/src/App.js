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
      launchArray: [],
      view: {
        page: 'home',
        pageTitle: 'on load'
      }
    }
  }
  //returns entire launch array, currently approx 100+ items
  pullLaunches = () => {
      fetch(`${apiUrl}`)
      .then(response => response.json())
      .then(jData => {
        this.setState({
          launchArray: jData
        })
        console.log(this.state.launchArray);
      })
      .catch(err=>console.log(err))
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
        <Nav />
        {/* this is a comment? */}
        <Main launchArray={this.state.launchArray}/>
      </div>
    )
  }
}

// =============================
// EXPORT
// =============================
export default App;
