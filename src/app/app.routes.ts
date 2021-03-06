//Import needed @angularDependencies.
import {RouterModule, Routes} from "@angular/router";

// Place needed components here!
import {HomeComponent} from "./home/home.component";
import {AboutUsComponent} from "./about-us/about-us.component";
import {AnimalPostComponent} from "./animal-post/animal-post.component";
import {AnimalCardComponent} from "./animal/animal.card.component";
import {AnimalCommentComponent} from "./animal/animal.comment.component";
import {ContactComponent} from "./animal/contact.component";
import {NavbarComponent} from "./shared/components/navbar/navbar.component";
import {SigninComponent} from "./shared/components/navbar/signin.component";
import {ProfileComponent} from "./profile/profile.component";
import {AnimalSearchComponent} from "./search/animal.search.component";
import {GoogleExitComponent} from "./shared/components/navbar/google.exit.component";
import {FacebookExitComponent} from "./shared/components/navbar/facebook.exit.component";
import {SignOutRedirectComponent} from "./sign-out-redirect/sign-out-redirect.component";
import {ShelterInfoComponent} from "./shelter/shelter.info.component";
import {FileSelectDirective} from "ng2-file-upload";
import {SuccessStoriesComponent} from "./success/success.stories.component";
import {AnimalEditComponent} from "./animal-post/animal-edit.component";
import {ProfileEditComponent} from "./profile/profile-edit.component";


// Import all needed Interceptors
import {APP_BASE_HREF} from "@angular/common";
import {HTTP_INTERCEPTORS} from "@angular/common/http";


//Import needed services
import {AuthService} from "./shared/services/auth.service";
import {AnimalService} from "./shared/services/animal.service";
import {CookieService} from "ng2-cookies";
import {CommentService} from "./shared/services/comment.service";
import {ProfileService} from "./shared/services/profile.service";
import {JwtHelperService} from "@auth0/angular-jwt";
import {SessionService} from "./shared/services/session.service";
import {SignOutService} from "./shared/services/sign.out.service";
import {DeepDiveInterceptor} from "./shared/interceptors/deep.dive.interceptor";
import {GoogleExitService} from "./shared/services/google.exit.service";
import {FacebookExitService} from "./shared/services/facebook.exit.service";




// Add components to the array that will be passed off to the module
export const allAppComponents = [HomeComponent, NavbarComponent, AnimalCardComponent, AnimalCommentComponent, AnimalPostComponent, AboutUsComponent, ContactComponent, SigninComponent, ProfileComponent, AnimalSearchComponent, GoogleExitComponent, FacebookExitComponent, FileSelectDirective, SignOutRedirectComponent, ShelterInfoComponent, SuccessStoriesComponent, AnimalEditComponent, ProfileEditComponent];
/**
 * Add routes to the array that will be passed off to the module.
 * Place them in order of most specific to least specific.
 **/
export const routes: Routes = [
	{path: "signed-out", component: SignOutRedirectComponent},
	{path: "facebook-exit", component: FacebookExitComponent},
	{path: "google-exit", component: GoogleExitComponent},
	{path: "animal/:animalId", component: AnimalCardComponent},
	{path: "animal-edit/:animalId", component: AnimalEditComponent},
	{path: "animal-post", component: AnimalPostComponent},
	{path: "success/:animalParameter/:animalValue", component: SuccessStoriesComponent},
	{path: "shelter", component: ShelterInfoComponent},
	{path: "about-us", component: AboutUsComponent},
	{path: "search/:animalParameter/:animalValue", component: AnimalSearchComponent},
	{path: "search", redirectTo: "/search/animalStatus/Lost"},
	{path: 'profile-edit/:profileId', component: ProfileEditComponent},
	{path: "profile", component: ProfileComponent},
	{path: "", component: HomeComponent},
];

// An array of services

const services: any[] = [AuthService, AnimalService, CommentService, CookieService, JwtHelperService, ProfileService, SessionService, SignOutService, GoogleExitService, FacebookExitService];

// An array of misc providers
const providers: any[] = [
	{provide: APP_BASE_HREF, useValue: window["_base_href"]},
	{provide: HTTP_INTERCEPTORS, useClass: DeepDiveInterceptor, multi: true}
];

export const appRoutingProviders: any[] = [providers, services];

export const routing = RouterModule.forRoot(routes);
