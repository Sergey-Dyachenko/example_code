import axios from 'axios';
import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import Loader from "./LoaderComponent";
class  DashboardSubscriptionsCount extends Component {
    constructor() {
        super();
        this.state = {
            subscriptions: '',
            isLoading: true
        }
    }
    componentDidMount() {
        const url = process.env.MIX_APP_URL + '/api/subscriptions/count-all';
        axios.get(url).then(response => {
            this.setState({
                subscriptions : response.data,
                isLoading: false
            });
        })
    }

    render() {
        if (this.state.isLoading) return <Loader/>;
        return (
            <div className="info-box">
                <span className="info-box-icon bg-gradient-green"><i className="fas fa-check"></i></span>
                <div className="info-box-content">
                    <a href={process.env.MIX_APP_URL + '/admin/subscriptions'}> <span className="info-box-text">Souscriptions</span></a>
                    <span className="info-box-number">{this.state.subscriptions}</span>
                </div>
            </div>
        );
    }
}

export default DashboardSubscriptionsCount;

if (document.getElementById('dashboard-subscriptions-сount')) {
    ReactDOM.render(<DashboardSubscriptionsCount/>, document.getElementById('dashboard-subscriptions-сount'));
}
