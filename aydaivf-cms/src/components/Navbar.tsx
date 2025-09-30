import { getMenu } from "@/lib/cms";
import NavbarClient from "./NavbarClient";

export default async function Navbar({ locale }: { locale: "tr" | "en" }) {
    const menu = await getMenu(locale);
    return <NavbarClient locale={locale} menu={menu} />;
}
