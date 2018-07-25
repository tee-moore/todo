import { Injectable } from '@angular/core';
import { Hero } from './hero';
import { Observable, of } from 'rxjs';
import { MessageService } from './message.service';
import { HttpClient, HttpHeaders } from '@angular/common/http';
import { map, catchError, tap } from 'rxjs/operators';


const httpOptions = {
    headers: new HttpHeaders({ 'enctype': 'multipart/form-data' })
};

@Injectable({
    providedIn: 'root',
})

export class HeroService {

    // URL to web api
    private heroesUrl = 'http://todo.loc/backend/web/tasks';

    constructor(
        private http: HttpClient,
        private messageService: MessageService) { }

    /** Log a HeroService message with the MessageService */
    private log(message: string) {
        this.messageService.add(`TODO application: ${message}`);
    }

    getHeroes (): Observable<Hero[]> {
        return this.http.get<Hero[]>(this.heroesUrl)
            .pipe(
                tap(heroes => this.log('fetched tasks')),
                catchError(this.handleError('getHeroes', []))
            );
    }

    /** GET hero by id. Will 404 if id not found */
    getHero(id: number): Observable<Hero> {
        const url = `${this.heroesUrl}/${id}`;
        return this.http.get<Hero>(url).pipe(
            tap(_ => this.log(`fetched task id=${id}`)),
            catchError(this.handleError<Hero>(`getHero id=${id}`))
        );
    }

    /** POST: add a new hero to the server */
    // addHero (hero: Hero): Observable<Hero> {
    //     return this.http
    //         .post<Hero>(this.heroesUrl, hero, httpOptions).pipe(
    //         tap((hero: Hero) => this.log(`added task id=${hero.id}`)),
    //         catchError(this.handleError<Hero>('addHero'))
    //     );
    // }

    addHero(hero: Hero): Observable<boolean> {
        const formData: FormData = new FormData();
        formData.append('title', hero.title);
        formData.append('description', hero.description);
        formData.append('created_at', hero.created_at);
        formData.append('status', hero.status);
        formData.append('imagefile', hero.imagefile);
        return this.http
            .post(this.heroesUrl, formData, httpOptions)
            .pipe(
                map(() => { return true; }),
            );
    }

    // postFile(imagefile: File): Observable<boolean> {
    //     const formData: FormData = new FormData();
    //     formData.append('imagefile', imagefile, imagefile.name);
    //     return this.http
    //         .post(this.heroesUrl, formData, httpOptions)
    //         .pipe(
    //             map(() => { return true; }),
    //         );
    // }

    /** DELETE: delete the hero from the server */
    deleteHero (hero: Hero | number): Observable<Hero> {
        const id = typeof hero === 'number' ? hero : hero.id;
        const url = `${this.heroesUrl}/${id}`;

        return this.http.delete<Hero>(url, httpOptions).pipe(
            tap(_ => this.log(`deleted task id=${id}`)),
            catchError(this.handleError<Hero>('deleteHero'))
        );
    }

    /** PUT: update the hero on the server */
    updateHero (hero: Hero): Observable<any> {
        return this.http.put(this.heroesUrl+'/' + hero.id, hero, httpOptions).pipe(
            tap(_ => this.log(`updated task id=${hero.id}`)),
            catchError(this.handleError<any>('updateHero'))
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