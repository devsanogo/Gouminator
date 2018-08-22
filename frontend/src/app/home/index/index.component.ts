import { Component, OnInit } from '@angular/core';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';

import { DataService } from '../../services/data.service';

@Component({
  selector: 'app-index',
  templateUrl: './index.component.html',
  styleUrls: ['./index.component.css']
})
export class IndexComponent implements OnInit {

  apiForm: FormGroup;
  error: string = '';
  loading: boolean = false;
  apiResponse: any[] = null;


  constructor(
    private formBuilder: FormBuilder,
    private dataService: DataService
) {
    this.apiForm = formBuilder.group({
        'rayon': ['', Validators.required],
    });
}

  ngOnInit() {
  }

  onSubmit() {
    let data = this.apiForm.value;
    this.loading = true;
    this.dataService
        .getVolume(data.rayon)
        .then(
            data => {
              switch(data.code) {
                case 11:
                    this.error = data.message;
                    this.apiResponse = null;
                    this.loading = false;
                    break;
                case 12:
                    this.error = data.message;
                    this.apiResponse = null;
                    this.loading = false;
                    break;
                default:
                  this.loading = false;
                  this.error = data.message;
                  this.apiResponse = data;
              }
            } ,
            error => this.error = error.message
        );
  }

}
