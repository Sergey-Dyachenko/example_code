import axios from 'axios';
import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import Loader from "./LoaderComponent";

class  DashboardClientsCount extends Component {
    constructor() {
        super();
        this.state = {
            clients: '',
            isLoading: true
        }
    }
    componentDidMount() {
        console.log(process.env.MIX_APP_URL);
        const url = process.env.MIX_APP_URL + '/api/clients/count-all';
        axios.get(url).then(response => {
            this.setState({
                clients : response.data,
                isLoading: false
            });
        })
    }

    render() {
        if (this.state.isLoading) return <Loader/>;
        return (
          <div className="info-box">
                <span className="info-box-icon bg-gradient-blue"><i className="fas fa-users"/></span>
                <div className="info-box-content">
                    <a href={process.env.MIX_APP_URL + '/admin/clients'}> <span className="info-box-text">Clients</span></a>
                    <span className="info-box-number">{this.state.clients}</span>
                </div>
            </div>
        );
    }
}

export default DashboardClientsCount

if (document.getElementById('dashboard-clients-сount')) {
    ReactDOM.render(<DashboardClientsCount />, document.getElementById('dashboard-clients-сount'));
}
