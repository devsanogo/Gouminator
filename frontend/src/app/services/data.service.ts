import { Injectable } from '@angular/core';
import { Http, Response } from '@angular/http';

@Injectable({
  providedIn: 'root'
})
export class DataService {

  constructor(private http: Http) {}

  getVolume(value: any) {
    let url     = 'http://localhost:4001/volume/' + value;
    return this.http
        .get(url)
        .toPromise()
        .then(resp => resp.json())
        .catch(error => console.log(error))
  }

  getAllVolums() {
    let url     = 'http://localhost:4001/volumes';
    return this.http
        .get(url)
        .toPromise()
        .then(resp => resp.json())
        .catch(error => console.log(error))
  }

}
