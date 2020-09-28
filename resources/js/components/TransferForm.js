import React from 'react';
const TransferForm = ({form,handleChange,handleSubmit}) =>{
    return (
        <form className="form-inline justify-content-center" onSubmit={handleSubmit}>
        <div className="form-goup mb-2">
            <input 
                type="text"
                className="form-control"
                placeholder="Description"
                name="description"
                value={form.description}
                onChange={handleChange}
            />
        </div>
        <div className="input-group ms-sm-2 mb-2">
            <div className="input-group-prepend">
                <div className="input-group-text">$</div>
            </div>
            <input 
                type="text"
                className="form-control"
                name="amount"
                value={form.amount}
                onChange={handleChange}
            />
        </div>
        <button
            type="submit"
            className="btn btn-primary mb-2"
        >
            Crear Transferencia
        </button>

    </form>
    )
}

export default TransferForm