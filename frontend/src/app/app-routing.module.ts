import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import { IndexComponent } from './home/index/index.component';
import { NotFoundComponent } from './not-found/not-found.component';

const routes: Routes = [
  {
    path : '',
    redirectTo : '/index',
    pathMatch : 'full' 
  },
  {
    path : 'index',
    component : IndexComponent
  },
  {path : '**', component : NotFoundComponent}
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
