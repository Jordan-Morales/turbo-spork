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
let apiUrl = 'https://api.spacexdata.com/v3/launches/';
let intApiUrl = 'http://turbo-spork-app.herokuapp.com/api/'
let test = 'test'

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
        // console.log(this.state.launchArray);
      })
      .catch(err=>console.log(err))
    }

  pullStuff = () => {
      fetch(`${intApiUrl}`)
      .then(response => response.json())
      .then(jData => {
        this.setState({
          notes: jData
        })
        console.log(this.state.notes);
      })
      .catch(err=>console.log(err))
    }
  componentDidMount() {
    this.pullLaunches()
    this.pullStuff()
  }



//// ==============
//// RENDER
//// ==============
  render(){
    return(
      <div className="container">
      This is some notess maybe: {this.state.notes}
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
