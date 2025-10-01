import { forwardRef } from "react";
export default forwardRef<HTMLDivElement, { className?: string; children: any }>(
    function Container({ className="", children }, ref) {
        return <div ref={ref} className={`mx-auto w-full max-w-7xl px-4 ${className}`}>{children}</div>;
    }
);
