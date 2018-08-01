import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';
import { FormsModule } from '@angular/forms';
import { AppComponent } from './app.component';
import { TasksComponent } from './tasks/tasks.component';
import { TaskDetailComponent } from './task-detail/task-detail.component';
import { MessagesComponent } from './messages/messages.component';
import { HttpClientModule } from '@angular/common/http';

@NgModule({
    declarations: [
        AppComponent,
        TasksComponent,
        TaskDetailComponent,
        MessagesComponent
    ],
    imports: [
        BrowserModule,
        FormsModule,
        HttpClientModule,
    ],
    providers: [
        // no need to place any providers due to the `providedIn` flag...
    ],
    bootstrap: [ AppComponent ]
})
export class AppModule { }