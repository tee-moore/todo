import { Injectable } from '@angular/core';
import { Hero } from './hero';
import { HEROES } from './mock-heroes';
import { Observable, of } from 'rxjs';
import { MessageService } from './message.service';
import { HttpClient, HttpHeaders } from '@angular/common/http';

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
        this.messageService.add(`HeroService: ${message}`);
    }

    /** GET heroes from the server */
    getHeroes (): Observable<Hero[]> {
        return this.http.get<Hero[]>(this.heroesUrl)
    }

}