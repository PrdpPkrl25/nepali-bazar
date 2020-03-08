import React, { Component } from 'react';
import ReactDOM from 'react-dom';

export default class Cakeapp extends Component {
    render() {
        return (
            <div className="container">
                <p>Cakeapp Component</p>
            </div>
        );
    }
}

if (document.getElementById('counter')) {
    ReactDOM.render(<counter/>, document.getElementById('counter'));
}