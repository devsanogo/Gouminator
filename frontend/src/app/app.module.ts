import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';
import { HttpModule } from '@angular/http';
import { ReactiveFormsModule } from '@angular/forms';
import { BrowserAnimationsModule } from '@angular/platform-browser/animations';

import { 
  MatButtonModule, 
  MatToolbarModule, 
  MatIconModule, 
  MatCardModule,
  MatFormFieldModule,
  MatInputModule,
  MatOptionModule, 
  MatAutocompleteModule,
  MatMenuModule,
  MatSidenavModule,
  MatProgressSpinnerModule, 
  MatDialogModule, 
  MatListModule,
} from '@angular/material';


import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { IndexComponent } from './home/index/index.component';
import { NotFoundComponent } from './not-found/not-found.component';
import { DataService } from './services/data.service';

@NgModule({
  declarations: [
    AppComponent,
    IndexComponent,
    NotFoundComponent,
  ],
  imports: [
    BrowserModule,
    BrowserAnimationsModule,
    MatButtonModule,
    MatToolbarModule,
    MatIconModule,
    MatCardModule,
    MatFormFieldModule,
    MatInputModule,
    MatOptionModule, 
    MatAutocompleteModule,
    MatMenuModule,
    MatSidenavModule,
    ReactiveFormsModule,
    MatProgressSpinnerModule, 
    MatListModule,
    HttpModule,
    MatDialogModule,
    AppRoutingModule
  ],
  providers: [DataService],
  bootstrap: [AppComponent]
})
export class AppModule { }
