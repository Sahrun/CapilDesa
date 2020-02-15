const  prototype = {
    IsNull,
    nameOf,
};

function IsNull(value) {
    return (value == null || value == "" || value == undefined) ? true:false;
}

function nameOf(obj){
    return Object.keys({obj})[0];
}

export default prototype;