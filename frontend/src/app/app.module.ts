import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';
import { HttpModule } from '@angular/http';
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

@NgModule({
  declarations: [
    AppComponent,
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
    MatProgressSpinnerModule, 
    MatListModule,
    HttpModule,
    MatDialogModule,
    AppRoutingModule
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
