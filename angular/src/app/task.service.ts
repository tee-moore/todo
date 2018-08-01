import { Injectable } from '@angular/core';
import { Task } from './task';
import { Observable, of } from 'rxjs';
import { MessageService } from './message.service';
import { HttpClient, HttpHeaders } from '@angular/common/http';
import { map, catchError, tap } from 'rxjs/operators';
import { url } from './config'

const httpOptions = {
    headers: new HttpHeaders({ 'enctype': 'multipart/form-data' })
};

@Injectable({
    providedIn: 'root',
})

export class TaskService {

    // URL to web api
    private tasksUrl = url + '/backend/web/tasks';

    constructor(
        private http: HttpClient,
        private messageService: MessageService) {
    }

    /** Log a TaskService message with the MessageService */
    private log(message: string) {
        this.messageService.add(`TODO application: ${message}`);
    }

    getTasks (): Observable<Task[]> {
        return this.http.get<Task[]>(this.tasksUrl)
            .pipe(
                tap(tasks => this.log('fetched tasks')),
                catchError(this.handleError('getTasks', []))
            );
    }

    /** GET task by id. Will 404 if id not found */
    getTask(id: number): Observable<Task> {
        const url = `${this.tasksUrl}/${id}`;
        return this.http.get<Task>(url).pipe(
            tap(_ => this.log(`fetched task id=${id}`)),
            catchError(this.handleError<Task>(`getTask id=${id}`))
        );
    }


    addTask(task: Task): Observable<Task> {
        const formData: FormData = new FormData();
        formData.append('title', task.title);
        formData.append('description', task.description);
        formData.append('created_at', task.created_at);
        formData.append('status', task.status);
        formData.append('imagefile', task.imagefile);
            return this.http
                .post<Task>(this.tasksUrl, formData, httpOptions).pipe(
                tap((task: Task) => this.log(`added task id=${task.id}`)),
                catchError(this.handleError<Task>('addTask'))
            );
    }

    /** DELETE: delete the task from the server */
    deleteTask (task: Task | number): Observable<Task> {
        const id = typeof task === 'number' ? task : task.id;
        const url = `${this.tasksUrl}/${id}`;

        return this.http.delete<Task>(url, httpOptions).pipe(
            tap(_ => this.log(`deleted task id=${id}`)),
            catchError(this.handleError<Task>('deleteTask'))
        );
    }

    /** PUT: update the task on the server */
    updateTask (task: Task): Observable<any> {
        return this.http.put(this.tasksUrl+'/' + task.id, task, httpOptions).pipe(
            tap(_ => this.log(`updated task id=${task.id}`)),
            catchError(this.handleError<any>('updateTask'))
        );
    }

    /**
     * Handle Http operation that failed.
     * Let the app continue.
     * @param operation - name of the operation that failed
     * @param result - optional value to return as the observable result
     */
    private handleError<T> (operation = 'operation', result?: T) {
        return (error: any): Observable<T> => {

            // TODO: send the error to remote logging infrastructure
            console.error(error); // log to console instead

            // TODO: better job of transforming error for user consumption
            this.log(`${operation} failed: ${error.message}`);

            // Let the app keep running by returning an empty result.
            return of(result as T);
        };
    }
}