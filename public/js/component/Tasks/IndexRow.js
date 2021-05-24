class IndexRow extends React.Component {
  componentDidMount(){
//        console.log(this.props.obj)
  }
  render(){
console.log( this.props.obj.date )
    return (
    <tr>
      <td>
        {this.props.obj.id}
      </td>
      <td>
        <a href={"/tasks/"+ this.props.obj.id}>
          <h3>{this.props.obj.title}</h3>
        </a>
        { this.props.obj.date }
      </td>
      <td>
        <a href={"/tasks/"+ this.props.obj.id +"/edit"} 
        className="btn btn-outline-primary">Edit
        </a>
      </td>
    </tr>
    )
  }
}

