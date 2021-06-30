
// any CSS you import will output into a single css file (app.css in this case)
import './styles/app.css';
// start the Stimulus application
import './bootstrap';
import React, { Component } from 'react';
import ReactDom from 'react-dom';

class App extends Component {
    render() {
        return (
            <div>
                <b>cheto</b>
            </div>
        )
    }
}

ReactDom.render(<App />, document.getElementById('root'));
