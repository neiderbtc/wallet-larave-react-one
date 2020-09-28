import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import TransferForm from './TransferForm'
import TransferList from './TransferList'
import url from './url'
console.log(url)
class  Example extends Component {
    constructor(props){
        super(props)
        this.state = {
            money: 0.0,
            transfers: [],
            error: null,
            form: {
                description: '',
                amount: '',
                wallet_id: 1
            }
        }

        this.handleChange = this.handleChange.bind(this)
        this.handleSubmit = this.handleSubmit.bind(this)
    }

    async handleSubmit(e){
        e.preventDefault();
        try {
            let config = {
                method: 'POST',
                headers: {
                    'accept': 'aplicacion/json',
                    'Content-Type': 'aplicacion/json'
                },
                body: JSON.stringify(this.state.form)
            }
            const urlApi = `${url}/api/transfers`;
            let res = await fetch(urlApi,config)
            let data = await res.json();
            this.setState({
                transfers: this.state.transfers.concat(data),
                money: this.state.money + parseInt((data.amount)) 
            })
        } catch (error) {
            this.setState({
                error
            })
        }
    }

    handleChange(e){
        this.setState({
            form:{
                ...this.state.form,
                [e.target.name]: e.target.value
            }
        })
    }

    async componentDidMount(){
        try {
            const urlApi = `${url}/api/wallet`;
            let res = await fetch(urlApi)
            let data = await res.json();
            this.setState({
                money: data.money,
                transfers: data.transfers
            })
        } catch (error) {
            this.setState({
                error
            })
        }
    }

    render(){
        return (
        <div className="container mt-5">
        <div className="row justify-content-center">
        <div className="col-md-8">
        <div className="card">
                <div className="col-md-12-m-t-md text-center">
                    <h5 className="card-title p-5"> $ {this.state.money} </h5>
                </div>
                <div className="col-md-12">
                {<TransferForm 
                    handleChange={this.handleChange}
                    form={this.state.form}
                    handleSubmit={this.handleSubmit}
                    />}
                </div>
            </div>
            <div className="m-t-md">
               {<TransferList 
                    transfers={this.state.transfers}
                />}
            </div>
            </div>
            </div>
        </div>
        );
    }
}

export default Example;

if (document.getElementById('example')) {
    ReactDOM.render(<Example />, document.getElementById('example'));
}
