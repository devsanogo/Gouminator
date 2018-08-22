import { Component } from '@angular/core';

import { DataService } from './services/data.service';

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css']
})
export class AppComponent {
  
  error: string = '';
  loading: boolean = false;
  responseList: any[] = null;
  responseClear: any[] = null;

  constructor(private dataService: DataService) {}

  getList() {
    this.loading = true;
    this.dataService
        .getAllVolums()
        .then(
            data => {
              this.loading = false;
              this.responseList = data
            },
            error => this.error = error.message
        );
  }

}
