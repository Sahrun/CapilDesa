import axios from 'axios';
import config from './config.js';
import { handleResponse,handleError } from './handleSevice.js';

const  httpService = {
    Post,
    Get,
};

function Post(urlRoute,data) {
     return axios.post(config.apiUrl+urlRoute, data)
    .then(handleResponse).then(respose => {
        return respose;
    }).catch(handleError);
}

function Get(urlRoute,param=null) {

    var UrlParam = (param == null || param == '' || param == 'null')? '' :param;
    return axios.get(config.apiUrl+urlRoute+"/"+UrlParam)
    .then(handleResponse)
    .then(respose => {
       return respose;
    })
    .catch(handleError);
}

export default httpService;