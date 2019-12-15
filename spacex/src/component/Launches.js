// =============================
// DEPENDENCIES
// =============================
// packages
import React from 'react'

// components

// =============================
// COMPONENT CLASS
// =============================
class Launches extends React.Component{



//// ==============
//// RENDER
//// ==============
  render (){
    return (
      <div className="card blue-grey">
      Number: {this.props.launchData.flight_number} <br/>
      Mission Name: {this.props.launchData.mission_name} <br/>
      Location: {this.props.launchData.launch_site.site_name_long} <br/>
      Date: {this.props.launchData.launch_date_local} <br/>
      </div>
    )
  }
}

// =============================
// EXPORT
// =============================
export default Launches
