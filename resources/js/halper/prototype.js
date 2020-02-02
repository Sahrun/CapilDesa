const  prototype = {
    IsNull,
};

function IsNull(value) {
    return (value == null || value == "" || value == undefined) ? true:false;
}


export default prototype;