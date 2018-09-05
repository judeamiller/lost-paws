import {Component, OnInit} from "@angular/core";
import {GoogleExitService} from "../../services/google.exit.service";
import {ActivatedRoute, Router} from "@angular/router";

import {Status} from "../../interfaces/status";

@Component({
	template: require("./google.exit.template.html")
})

export class GoogleExitComponent implements OnInit{
	code: string = this.route.snapshot.queryParams["code"];
	status: Status = null;

	constructor(protected googleExitService: GoogleExitService, protected route: ActivatedRoute, protected router: Router){

	}

	ngOnInit(){
		this.googleExitService.getRedirect(this.code).subscribe(status => {
			this.status = status;

			if(this.status.status === 200) {
				this.router.navigate([""]);
			}
		});
	}
}