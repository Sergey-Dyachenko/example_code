import axios from 'axios';
import React, {Component} from 'react';
import ReactDOM from 'react-dom';
import Loader from "./LoaderComponent";


class ProfileClientComponent extends Component{
   constructor(props) {
       super(props);
       const element = document.getElementById('profile-client');
       const id = element.getAttribute('data-id');
       this.state ={
           loading: true,
           profile: {
               first_name: '',
               last_name:'',
               phone: '',
               email: ''
           },
           stripe_info:{
               date_start: '',
               date_end: '',
               payment_period: '',
               active: ''
           },
           product_name:{
               name: ''
           },
           id: id,
           isLoading : true
       }

       this.handleChange = this.handleChange.bind(this);
       this.handleSubmit = this.handleSubmit.bind(this);
   }

    componentDidMount() {
        const url = process.env.MIX_APP_URL + '/api/clients/to-api/'+ this.state.id;
        axios.get(url)
            .then(res => {
                const profile = res.data;
                this.setState({profile});
                this.setState({isLoading: false});
            })

        const url_stripe = process.env.MIX_APP_URL + '/api/clients/to-api/stripe-info/'+ this.state.id;
        axios.get(url_stripe)
            .then(res => {
                const stripe_info = res.data;
                this.setState({stripe_info});
                this.setState({isLoading: false});
            })

        const url_product_name = process.env.MIX_APP_URL + '/api/clients/to-api/stripe-product-name/'+ this.state.id;
        axios.get(url_product_name)
            .then(res => {
                const product_name = res.data;
                this.setState({product_name});
                this.setState({isLoading: false});
            })

    }

    handleChange(e) {
        console.log('handleChangeFirstName', e.target.value,e.target.name);
       this.setState({
           profile: {
               ...this.state.profile,
               [e.target.name] : e.target.value
           }
       })

    }


    handleSubmit(event){
       event.preventDefault();
       const { profile, id } = this.state;
        let url =  process.env.MIX_APP_URL+'/api/clients/to-api/' + id;
       axios.put(url, profile).then((response) => {
           console.log(profile)
       });
        this.setState({profile});
    }

    render() {
       const profile = this.state.profile;
       const stripe_info = this.state.stripe_info;
       const product_name = this.state.product_name;
       if (this.state.isLoading)  return <Loader/>;

       return (

           <div id="client-profile">
            {/*<form onSubmit={this.handleSubmit}>*/}
                <div className="form-group">
                <h3>Client info</h3>
                <table className="table">
                    <thead>
                    <tr>
                       <th scope="col">Prénom</th>
                        <th scope="col">Nom de famille</th>
                        <th scope="col">Téléphone</th>
                        <th scope="col" >Email</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>{profile.first_name}</td>
                        <td>{profile.last_name}</td>
                        <td>{profile.phone}</td>
                        <td>{profile.email}</td>
                    </tr>
                    </tbody>
                </table>
                </div>
               <div className="form-group">
                   <h3>Licences achetées</h3>
                   <table className="table">
                       <thead>
                       <tr>
                           <th scope="col">Nom de la licence</th>
                           <th scope="col">Date d'achat</th>
                           <th scope="col">Date d'expiration de la licence</th>
                           <th scope="col" >Mode de paiment</th>
                           <th scope="col" >Active</th>
                       </tr>
                       </thead>
                       <tbody>
                       <tr>
                           <td>{product_name.name}</td>
                           <td>{stripe_info.date_start}</td>
                           <td>{stripe_info.date_end}</td>
                           <td>{stripe_info.payment_period}</td>
                           <td>{stripe_info.active.toString()}</td>
                       </tr>
                       </tbody>
                   </table>
               </div>
                {/*<h3>Client info</h3>*/}
                {/*<div className="row">*/}
                {/*    <div className="col-xs-12">*/}
                {/*        <div className="box">*/}
                {/*            <div className="box-header">*/}
                {/*            </div>*/}
                {/*            <div className="box-body">*/}
                {/*                <div className="col-xs-6">*/}
                {/*                    <h4>First name</h4>*/}
                {/*                    <label htmlFor="first_name"></label>*/}
                {/*                    <input type="text" name="first_name" onChange={this.handleChange} defaultValue={profile.first_name}/>*/}
                {/*                </div>*/}
                {/*                <div className="col-xs-6">*/}
                {/*                    <h4>Last name</h4>*/}
                {/*                    <label htmlFor="last_name"></label>*/}
                {/*                    <input type="text" name="last_name" onChange={this.handleChange} defaultValue={profile.last_name}/>*/}
                {/*                </div>*/}
                {/*            </div>*/}
                {/*        </div>*/}
                {/*    </div>*/}
                {/*    <div className="col-xs-12">*/}
                {/*        <div className="box">*/}
                {/*            <div className="box-header">*/}
                {/*            </div>*/}
                {/*            <div className="box-body">*/}
                {/*                <div className="col-xs-6">*/}
                {/*                    <h4>Phone</h4>*/}
                {/*                    <label htmlFor="phone"></label>*/}
                {/*                    <input type="text" name="phone"  onChange={this.handleChange} defaultValue={profile.phone} />*/}
                {/*                </div>*/}
                {/*                <div className="col-xs-6">*/}
                {/*                    <h4>Email</h4>*/}
                {/*                    <label htmlFor="e-mail"></label>*/}
                {/*                    <input type="text" name="email" onChange={this.handleChange} defaultValue={profile.email}/>*/}
                {/*                </div>*/}
                {/*            </div>*/}
                {/*        </div>*/}
                {/*    </div>*/}
                {/*</div>*/}
                {/*<h3>Payment info</h3>*/}
                {/*<div className="row">*/}
                {/*    <div className="col-xs-12">*/}
                {/*        <div className="box">*/}
                {/*            <div className="box-header">*/}
                {/*            </div>*/}
                {/*            <div className="box-body">*/}
                {/*                <div className="col-xs-6">*/}
                {/*                    <h4>token_expiration_date</h4>*/}
                {/*                    <label htmlFor="token_expiration_date"></label>*/}
                {/*                    <input type="text" name="token_expiration_date" onChange={this.handleChange}  defaultValue={profile.token_expiration_date}/>*/}
                {/*                </div>*/}
                {/*                <div className="col-xs-6">*/}
                {/*                    <h4>Stripe Id</h4>*/}
                {/*                    <label htmlFor="stripe_id"></label>*/}
                {/*                    <input type="text" name="stripe_id"  onChange={this.handleChange}  defaultValue={profile.stripe_id}/>*/}
                {/*                </div>*/}
                {/*            </div>*/}
                {/*        </div>*/}
                {/*    </div>*/}
                {/*    <div className="col-xs-12">*/}
                {/*        <div className="box">*/}
                {/*            <div className="box-header">*/}
                {/*            </div>*/}
                {/*            <div className="box-body">*/}
                {/*                <div className="col-xs-6">*/}
                {/*                    <h4>Card Brand</h4>*/}
                {/*                    <label htmlFor="card_brand"></label>*/}
                {/*                    <input type="text" name="card_brand" onChange={this.handleChange} value={profile.card_brand}/>*/}
                {/*                </div>*/}
                {/*                <div className="col-xs-6">*/}
                {/*                    <h4>Card Last Four</h4>*/}
                {/*                    <label htmlFor="card_last_four"></label>*/}
                {/*                    <input type="text" name="card_last_four" onChange={this.handleChange} value={profile.card_last_four}/>*/}
                {/*                </div>*/}
                {/*            </div>*/}
                {/*        </div>*/}
                {/*    </div>*/}
                {/*</div>*/}
                {/*<div className="form-group">*/}
                {/*    <button className="btn-primary">Update</button>*/}
                {/*</div>*/}
            {/*</form>*/}
        </div>

    );
    }
}
export default ProfileClientComponent;

if (document.getElementById('profile-client')) {
    ReactDOM.render(<ProfileClientComponent />, document.getElementById('profile-client'));
}
